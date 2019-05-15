<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\CreateItemRequest;
    use App\Item;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    class ItemController extends Controller
    {

        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \App\Http\Requests\CreateItemRequest $request
         *
         * @return void
         */
        public function store(CreateItemRequest $request)
        {
            $time             = Carbon::createFromTimestampUTC(strtotime($request->get('deadline')));
            $data             = $request->validated();
            $data['deadline'] = $time->format("Y-m-d H:i:s");

            $item = Item::create($data);

            return redirect()->route('list.show', $item->list->id);
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
