<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Kalnoy\Nestedset\NodeTrait;
class Comment extends Model
{
    use NodeTrait;
    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    /**
     * @return bool
     */
    public function hasChildren(): bool
    {
        return $this->children()->count() > 0;
    }
    /**
     * @return mixed
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
    // // Получить владельца полиморфного отношения
    // public function creator($id)
    // {
    //     return \App\User::find($id);
    // }
    /**
     * Получить владельца полиморфного отношения
     * от полиморфной модели, получив доступ к имени метода,
     * который вызывает morphTo()
     * @return mixed
     **/
    public function creator(): MorphTo
    {
        return $this->morphTo('creator');
    }
    /**
     * @param Model $commentable
     * @param $data
     * @param Model $creator
     *
     * @return static
     */
    public function createComment(Model $commentable, $data, Model $creator): self
    {
        return $commentable->comments()->create(array_merge($data, [
            'creator_id' => $creator->id,
            'creator_type' => get_class($creator),
        ]));
    }
    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function updateComment($id, $data): bool
    {
        return (bool) static::find($id)->update($data);
    }
    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteComment($id): bool
    {
        return (bool) static::find($id)->delete();
    }
}