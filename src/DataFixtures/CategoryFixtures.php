<?php

namespace App\DataFixtures;

use App\CategoryFeatureApi\DTORequestFactory\CategoryCreateDTOFactoryInterface;
use App\CategoryFeatureApi\Service\CategoryServiceInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    private CategoryCreateDTOFactoryInterface $createRequestFactory;
    private CategoryServiceInterface $categoryService;

    public function __construct(
        CategoryCreateDTOFactoryInterface $createRequestFactory,
        CategoryServiceInterface $categoryService
    ) {
        $this->createRequestFactory = $createRequestFactory;
        $this->categoryService = $categoryService;
    }

    public function load(ObjectManager $manager): void
    {
        $categoryRequest = $this->createRequestFactory->create();
        $categoryRequest->setTitle("My first category");
        $categoryRequest->setSlug("test-slug");
        $categoryRequest->setContent("Dummy category content");
        $categoryRequest->setActive(true);

        $this->categoryService->create($categoryRequest);
    }
}
