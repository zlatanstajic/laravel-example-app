<?php

namespace App\Http\Resources;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * @var int|null
     */
    public ?int $id;

    /**
     * @var string|null
     */
    public ?string $title;

    /**
     * @var string|null
     */
    public ?string $description;

    /**
     * @var bool|null
     */
    public ?bool $completed;

    /**
     * @var string|null
     */
    public ?string $created_at;

    /**
     * @var string|null
     */
    public ?string $updated_at;

    /**
     * Transform the resource into an array
     *
     * @param  Request  $request
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $this->id = $this->resource->id;
        $this->title = $this->resource->title;
        $this->description = $this->resource->description;
        $this->completed = $this->resource->completed;
        $this->created_at = $this->resource->created_at?->toDateTimeString();
        $this->updated_at = $this->resource->updated_at?->toDateTimeString();

        return [
            'type'       => Todo::class,
            'id'         => $this->id,
            'attributes' => [
                'title'       => $this->title,
                'description' => $this->description,
                'completed'   => $this->completed,
                'created_at'  => $this->created_at,
                'updated_at'  => $this->updated_at,
            ],
        ];
    }
}

