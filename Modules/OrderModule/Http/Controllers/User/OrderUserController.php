<?php

namespace Modules\OrderModule\Http\Controllers\user;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\File as HttpFile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Modules\CartModule\Services\CartService;
use Modules\MaterialModule\Entities\PaperSize;
use Modules\MaterialModule\Services\PaperSizePaperTypeService;
use Modules\MaterialModule\Services\PaperSizeService;
use Modules\MaterialModule\Services\PaperTypeService;
use Modules\OrderModule\Services\OrderService;
use PHPUnit\Framework\Constraint\FileExists;

use function PHPUnit\Framework\assertIsFloat;

class OrderUserController extends Controller
{

    private $paperSizeService;
    public function __construct(
        OrderService $orderService,
        PaperSizeService $paperSizeService,
        PaperTypeService $paperTypeService,
        PaperSizePaperTypeService $paperSizePaperTypeService,
        CartService $cartService
    ) {
        $this->orderService = $orderService;
        $this->paperSizeService = $paperSizeService;
        $this->paperTypeService = $paperTypeService;
        $this->paperSizePaperTypeService = $paperSizePaperTypeService;
        $this->cartService = $cartService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        // $order_item = $this->cartService->findOne($request->id);
        // $data['image'] = $order_item->image;
        // $image = $data['image'] ;
        // $pdf = Pdf::loadView('cartmodule::attach', compact('image'), $data);
        // // $pdf = App::make('dompdf.wrapper');
        // // $pdf->loadHTML('<img src="'.public_path('uploads/cart/').'">')
        // // $pdf->loadHTML('<h1>ddd</h1>');

        // // $pdf->loadHTML('<img src="'.$data['image'].'">');
        // return $pdf->stream();
        // return view('ordermodule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        
        $order_item = $this->cartService->findOne($request->id);
        $data["email"] = 'print@mall105.com';
        $data["title"] = "ORDER";
        $data['item'] = $order_item;
        $data['user'] = $order_item->customer;
        $data['image'] = $order_item->image;
        $image = $data['image'] ;
        $pdf = Pdf::loadView('cartmodule::attach', compact('image'), $data);
        Mail::send('cartmodule::pdf', $data, function ($message) use ($data,$pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "design.pdf");

        }
);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeBrochure(Request $request)
    {

        // dd($request->toArray());

        $this->orderService->createBrochureOrder($request->all());
    }

    public function storeLargeFolder(Request $request)
    {
        $this->orderService->createLargeFolder($request->all());
    }

    public function storeFlyer(Request $request)
    {
        $this->orderService->createFlyer($request->all());
    }

    // letterhead
    public function storeLetterhead(Request $request)
    {
        $this->orderService->createLetterhead($request->all());
    }


    // sticker
    public function storeSticker(Request $request)
    {
        $this->orderService->createSticker($request->all());
    }

    // block note
    public function storeBlocknote(Request $request)
    {
        $this->orderService->createBlocknote($request->all());
    }

    // prescription
    public function storePrescription(Request $request)
    {
        $this->orderService->createPrescription($request->all());
    }


    // envelope
    public function storeEnvelope(Request $request)
    {
        $this->orderService->createEnvelope($request->all());
    }


    // copybook
    public function storeCopybook(Request $request)
    {
        $this->orderService->createcopybook($request->all());
    }


    // filter dropdown menu
    public function filterPaperTypes($cat_id, $size_id)
    {
        //    dd($cat_id);
        // dd('55');
        $selected_size = $this->paperSizePaperTypeService->findWhere(['paper_size_id' => $size_id, 'category_id' => $cat_id])->toArray();
        // dd($selected_size->toArray());
        $filtered_types = [];
        foreach ($selected_size as $size) {
            $filtered_types[$size['id']]['type_id'] =  $size['paper_type_id'];
        }
        $types = [];
        $i = 1;
        foreach ($filtered_types as $type) {
            // dd(( $this->paperTypeService->findWhere(['id'=>$type['type_id']])->first()->toArray()));
            $types[$i] = $this->paperTypeService->findWhere(['id' => $type['type_id']])->first()->toArray();
            $i++;
        }
        // dd($types);
        // $selected_size->paperTypesForSize->toArray();
        // dd(($filtered_types));
        return $types;
    }
}
