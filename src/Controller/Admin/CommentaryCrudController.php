<?php

namespace App\Controller\Admin;

use App\Entity\Commentary;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentaryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commentary::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('comment'),
            TextField::new('author'),
            DateField::new('created_at'),
            DateField::new('updated_at'),
            AssociationField::new('post')->autocomplete(),
        ];
    }
}
