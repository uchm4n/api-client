<?php

namespace U\API;

use GuzzleHttp\Client;

class APIClient
{
    private UrlGenerator $url;
    private Client $client;

    /**
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->url    = new UrlGenerator();
    }

    public function getPosts(): ?array
    {
        return $this->request('GET', 'posts/');
    }

    public function getPostByID(int $id): ?array
    {
        return $this->request("GET", "posts/{$id}");
    }

    public function getPostWithComments(int $id): ?array
    {
        return $this->request("GET", "posts/{$id}/comments");
    }

    public function getCommentsByPost(int $id): ?array
    {
        return $this->request("GET", "comments/", ['postId' => $id]);
    }

    public function savePost(array $data): ?array
    {
        return $this->request('POST', "posts/", $data);
    }

    public function updatePost(array $data): ?array
    {
        return $this->request('PUT', "posts/{$data['id']}", $data);
    }
    public function patchPost(array $data): ?array
    {
        return $this->request('PATCH', "posts/{$data['id']}", $data);
    }

    public function deletePost(int $id): ?array
    {
        return $this->request('DELETE', "posts/{$id}");
    }

    protected function request(string $method, string $resource, array $body = [], string $mode = UrlGenerator::API_MODE): ?array
    {
        $url      = $this->url->make($resource, $mode);
        $response = $this->client
            ->request($method, $url, ['json' => array_filter($body)])
            ->getBody()
            ->getContents();

        return json_decode($response, true);
    }

}
