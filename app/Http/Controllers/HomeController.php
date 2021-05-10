<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Yii;
use PDF;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $json = file_get_contents('php://input');
//        $data = json_decode($json);
//        $data = (array) $data;
//        p($data);
        $data = [
            'product' => 'Standard Business Card',
            'quantity' => '1000',
            'coating' => 'UV Two Sides',
            'color' => 'Full Color',
            'turnaround' => '2 Business Days',
            'orderdate' => '2021-03-18 00:00:00',
            'jobname1' => 'Test Job',
            'ordersid' => '183256',
            'size' => '2 x  3.5',
            'duedate' => '2021-03-18 00:00:00',
            'sides' => 'Two Sided',
            'files' =>
                [
                    [
                        'file' => asset('images/Aquatic-Front.jpg'),
                        'name' => 'Aquatic-Front.jpg',
                        'type' => '.jpg',
                    ],
                    [
                        'file' => asset('images/Aquatic-Back.jpg'),
                        'name' => 'Aquatic-Back.jpg',
                        'type' => '.jpg',
                    ],
                    // [
                    //     'file' => asset('images/images.jpeg'),
                    //     'name' => 'images-Front.jpeg',
                    //     'type' => '.jpeg',
                    // ],
                ],
            'id' => '183256',
            'invoice' => 'EG12-515454',
            'category' => 'Business Cards',
            'stock' => '14PT C2S',
            'jobname' => 'Test Job',
        ];

        if (!empty($data) && isset($data['files'])) {
            if (!empty($data['files'])) {
                foreach ($data['files'] as $image) {
                    $isCymk = 1;
                    $imageParts = explode('-', $image['name']);
                    if (!empty($imageParts)) {
                        $imageParts = explode('.', $imageParts[1]);
                        if (isset($imageParts[0]) && $imageParts[0] == 'Front') {
                            $image['image_view'] = 'Front';
                        } elseif ($imageParts[0] && $imageParts[0] == 'Back') {
                            $image['image_view'] = 'Back';
                        }
                    }

                    // check CYMK validation
                    $size = getimagesize($image['file']);
                    if (!empty($size)) {
                        if ($size['channels'] != 4) {
                            $isCymk = 0;
                        }
                    }
                    $image['isCymk'] = $isCymk;
                    $data['images'][] = $image;
                }
            }
        }

        return view('home')->with('order_detail', $data);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param int $id
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Generate PDF
    public function createPDF() {
      // retreive all records from db
     // echo "<pre>";  print_r($_POST);die();
      //$data = array();
      $datas = $_POST;
      $newArray = [];
      foreach($datas as $data){
        
        $newArray[$data['previewItem']] =  $data['canvasImageData'];

      }
      //echo "<pre>";  print_r($newArray);die();
      // share data to view
      view()->share('employee',$newArray);
      $pdf = PDF::loadView('pdf_view', $newArray);

      // download PDF file with download method
      //return $pdf->download('pdf_file.pdf');

      // $pdf->stream("dompdf_out.pdf", array("Attachment" => false));

      //   exit(0);
        $path = public_path('pdf');
        $fileName =  time().'.'. 'pdf' ;
        $pdf->save($path . '/' . $fileName);

        $filePath = asset('pdf/').'/'.$fileName;
        //$pdf12 = public_path('pdf/'.$fileName);
        echo $filePath;
        die();
        return response()->download($pdf);
    }
}
