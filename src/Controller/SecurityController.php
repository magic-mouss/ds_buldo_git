<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="security")
     */
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
   public function login (Request $request, EntityManagerInterface $manager): Response
   {
	//Récupération Iidentifiant et password
	$identifiant = $request->request->get('identifiant');
	$identifiant = $request->request->get('password');
        //connexion avec la BD et récupération du couple id/password
	$aUser = $manager->getRepository(Utilisateur::class)->findBy(["nom"=>$identifiant, "code"=>$password]);
	//test de l'existence d'un tel couple
	if (sizeof($aUser)>0){
		//récupération de l'utilisateur
		$utilisateur = new User;
		$utilisateur = $aUser[0];
		//démarrage session
		$sess = $request->getSession();
		//créer varaibles session
		$sess->set("idUtilisateur", $utilisateur->getId());
		$sess->set("nomUtilisateur", $utilisateur->getNom());
		$sess->set("prenomUtilisateur", $utilisateur->getPrenom());
		return $this->redirectToRoute('dashboard');
   }else{
	return $this->redirectToRoute('security');
   }
   }
}
