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
         * Display the specified resource.
         *
         * @param $id
         *
         * @return void
         */
        public function completed($id)
        {
            $item         = Item::find($id);
            $item->status = 1;
            $item->save();

            return redirect()->route('list.show', $item->list);
        }

        /**
         * Display the specified resource.
         *
         * @param $id
         *
         * @return void
         */
        public function pending($id)
        {
            $item         = Item::find($id);
            $item->status = 0;
            $item->save();

            return redirect()->route('list.show', $item->list);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return bool
         */
        public function change(Request $request)
        {
            $item         = Item::find($request->get('pk'));
            $item->detail = $request->get('value');
            $item->save();

            return $item;
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Item $item
         *
         * @return \Illuminate\Http\Response
         * @throws \Exception
         */
        public function destroy(Item $item)
        {
            $item->delete();

            return redirect()->route('list.show', $item->list);
        }
    }
