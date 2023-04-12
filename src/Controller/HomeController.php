<?php

namespace App\Controller;

use Dompdf\Dompdf;
use App\Repository\CurriculumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(CurriculumRepository $cv): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'cv'=>$cv->findAll(),
            $dompdf= new Dompdf(),
            $dompdf -> loadHtml('hello world'),
            'pdf'=>$dompdf,
            //  dd($dompdf),
        ]);
    }

    #[Route('/')]
    public function redirectToHome():Response{
    return $this->redirectToRoute('app_home');
}

#[Route('/pdf', name: 'app_pdf')]
public function downloadPdf(CurriculumRepository $cv): Response
{
    // return $this->render('pdf_generator/index.html.twig', [
    //     'controller_name' => 'PdfGeneratorController',
    // ]);
    $data = [
       'cv' =>$cv->findAll()
    ];
    $html =  $this->renderView('home/index.html.twig', $data);
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->render();
     
    return new Response (
        $dompdf->stream('resume', ["Attachment" => false]),
        Response::HTTP_OK,
        ['Content-Type' => 'application/pdf']
    );
}

private function imageToBase64($path) {
    $path = $path;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}
}