<?php

namespace App\Controller;

use Dompdf\Dompdf;
use App\Repository\CurriculumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Curriculum;
use App\Form\CurriculumType;

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
#[Route('/new', name: 'app_cv_new')]
public function new(){
    $cv= new Curriculum();
    $cv->setFirstname('paul')
       ->setLastname('pierre')
       ->setCity('marseille')
       ->setAge('35')
       ->setLevelOfStudies('bts')
       ->setTotalExperience('10')
       ->setLinkLinkedin('https://linkedin.com')
       ->setLinkGithub('https://github.com');

    $form =$this->createForm(CurriculumType::class, $cv);

    return $this->render('home/new.html.twig',['form'=>$form->createView(),]);
}

}
