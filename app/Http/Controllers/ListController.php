<?php

    namespace App\Http\Controllers;

    use App\Lists;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;

    class ListController extends Controller
    {

        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $lists = auth()->user()->list;

            return view('home', compact('lists'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $data = [
                'slug'  => Str::slug($request->get('title')),
                'title' => $request->get('title')
            ];

            $list = auth()->user()->list()->create($data);
            if ($list) {
                return redirect()->back()->with('message', 'Liste eklendi');
            }

            return redirect()->route('home')->withErrors("Liste eklerken sorun oluştu.");
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Lists $list
         *
         * @return void
         */
        public function show(Lists $list)
        {
            $lists = auth()->user()->list();

            $completed = $list->items()->where('status', 1)->get();
            $pending   = $list->items()->where('status', 0)->get();

            return view('list', compact('list', 'lists', 'completed', 'pending'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function change(Request $request)
        {
            $list        = Lists::find($request->get('pk'));
            $list->title = $request->get('value');
            $list->save();

            return $list;
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Lists $list
         *
         * @return \Illuminate\Http\Response
         * @throws \Exception
         */
        public function destroy(Lists $list)
        {
            if ($list->delete()) {
                $list->items()->forceDelete();
            }

            return redirect()->route('home');
        }
    }
