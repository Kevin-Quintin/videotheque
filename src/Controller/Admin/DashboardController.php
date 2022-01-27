<?php

namespace App\Controller\Admin;

use App\Controller\MovieController;
use App\Entity\Categorie;
use App\Entity\Movie;
use App\Entity\Figurent;
use App\Entity\Role;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(MovieCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Videotheque');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Important');
        yield MenuItem::linkToCrud('Films', 'fa fa-film', Movie::class);
        yield MenuItem::linkToCrud('Catégories', 'fa fa-folder', Categorie::class);
        yield MenuItem::linkToCrud('Figurents', 'fa fa-users', Figurent::class);
        yield MenuItem::linkToCrud('Role', 'fa fa-user-tag', Role::class);
    }
}