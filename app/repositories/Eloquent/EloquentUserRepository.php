<?php

namespace App\repositories\Eloquent;

use App\Entities\User\UserEntity;
use App\Entities\Users\UserEloquentEntity;
use App\Models\User;
use App\repositories\Contracts\UserRepositoryInterface;
use mysql_xdevapi\Exception;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface
{
    protected $model = User::class;

    public function create(array $data)
    {
        $newUser = parent::create($data);
        return new UserEloquentEntity($newUser);
    }

    public function update(int $id, array $data): UserEntity
    {
        if (!parent::update($id, $data)) {
            throw new \Exception('بروز رسانی کاربر با مشکل مواجه شد ');
        }
        return new UserEloquentEntity(parent::find($id));

    }
}
