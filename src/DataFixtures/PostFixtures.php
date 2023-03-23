<?php

namespace App\DataFixtures;

use App\PostFeatureApi\DTORequestFactory\PostCreateDTOFactoryInterface;
use App\PostFeatureApi\Service\PostServiceInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    private PostCreateDTOFactoryInterface $createRequestFactory;
    private PostServiceInterface $postService;

    public function __construct(
        PostCreateDTOFactoryInterface $createRequestFactory,
        PostServiceInterface $postService
    ) {
        $this->createRequestFactory = $createRequestFactory;
        $this->postService = $postService;
    }

    public function load(ObjectManager $manager): void
    {
        $postRequest = $this->createRequestFactory->create();
        $postRequest->setSlug("my-test-slug");
        $postRequest->setTitle("My dummy title");
        $postRequest->setContent("This is dummy content");
        $postRequest->setPublished(true);
        $postRequest->setCategoryId(1);

        $this->postService->create($postRequest);
    }
}
