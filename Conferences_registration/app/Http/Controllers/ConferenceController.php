<?php 

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('conferences.index', compact('conferences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'required',
            'address' => 'nullable|string',
            'lecturers' => 'nullable|string',
        ]);

        Conference::create($request->only(['name', 'date', 'time', 'description', 'address', 'lecturers']));

        return redirect()->route('dashboard3')->with('success', 'Conference created successfully!');
    }

    public function edit(Conference $conference)
    {
        return view('conferences.edit', compact('conference'));
    }

    public function update(Request $request, Conference $conference)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'required',
            'address' => 'nullable|string',
            'lecturers' => 'nullable|string',
        ]);

        $conference->update($request->only(['name', 'date', 'time', 'description', 'address', 'lecturers']));

        return redirect()->route('conferences.index')->with('success', 'Conference updated successfully!');
    }

    public function destroy(Conference $conference)
    {
        if ($conference->date < now()->toDateString()) {
            return redirect()->route('conferences.index')->with('error', 'This conference has already passed and cannot be deleted.');
        }

        $conference->delete();

        return redirect()->route('conferences.index')->with('success', 'Conference deleted successfully!');
    }

    public function show($conferenceId)
    {
        $conference = Conference::with('participants')->findOrFail($conferenceId);
        $user = auth()->user();

        $isRegistered = $conference->participants->contains($user->id);

        $canUnregister = $isRegistered && now()->diffInDays($conference->date) > 1;

        return view('conferences.show', compact('conference', 'isRegistered', 'canUnregister'));
    }

    public function registerForConference($conferenceId)
    {
        $conference = Conference::findOrFail($conferenceId);
        $user = auth()->user();

        if ($conference->participants->contains($user->id)) {
            return redirect()->route('dashboard')->with('error', 'Jūs jau esate užsiregistravęs į šią konferenciją.');
        }

        $conference->participants()->attach($user->id);

        return redirect()->route('dashboard')->with('success', 'Sėkmingai užsiregistravote į konferenciją.');
    }

    public function unregisterForConference($conferenceId)
    {
        $conference = Conference::findOrFail($conferenceId);
        $user = auth()->user();

        if ($conference->participants->contains($user->id)) {
            if (now()->diffInDays($conference->date) > 1) {
                $conference->participants()->detach($user->id);
                return redirect()->route('dashboard')->with('success', 'Sėkmingai išsiregistravote iš konferencijos.');
            } else {
                return redirect()->route('conferences.show', $conferenceId)->with('error', 'Negalite išsiregistruoti mažiau nei likus 24 valandoms iki konferencijos.');
            }
        }

        return redirect()->route('dashboard')->with('error', 'Jūs nesate užsiregistravęs į šią konferenciją.');
    }

    public function inform($conferenceId)
    {
        $conference = Conference::with('participants')->findOrFail($conferenceId);

        return view('inform', compact('conference'));
    }

    public function dashboardWorkerView()
    {
        $today = now()->toDateString();

        $pastConferences = Conference::where('date', '<', $today)->get();
        $upcomingConferences = Conference::where('date', '>=', $today)->get();

        return view('dashboard2', compact('pastConferences', 'upcomingConferences'));
    }
}
