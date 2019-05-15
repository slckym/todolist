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
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
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

            return view('list', compact('list', 'lists'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int                      $id
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
    }
