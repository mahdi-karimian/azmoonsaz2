<?php

namespace App\repositories\Json;

use App\repositories\Contracts\RepositoryInterface;

class JsonBaseRepository implements RepositoryInterface
{
    public function create(array $data)
    {
        if (file_exists('users.json')) {
            $users = json_decode(file_get_contents('users.json'), true);
            $data['id'] = rand(1, 1000);
            array_push($users, $data);
            file_put_contents('users.json', json_encode($users));
        } else {
            $users = [];
            $data['id'] = rand(1, 1000);
            array_push($users, $data);
            file_put_contents('users.json', json_encode($users));
        }
    }

    public function all(array $where)
    {
        $query = $this->model::query();

        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }

        return $query->get();
    }

    public function update(int $id, array $data)
    {

        $users = json_decode(file_get_contents('users.json'), true);

        foreach ($users as $key => $user) {
            if ($user['id'] == $id) {
                $user['full_name'] = $data['full_name'] ?? $user['full_name'];
                $user['email'] = $data['email'] ?? $user['email'];
                $user['mobile'] = $data['mobile'] ?? $user['mobile'];

                unset($users[$key]);
                array_push($users, $user);
                if (file_exists('users.json')) {
                    unlink('users.json');
                }

                file_put_contents('users.json', json_encode($users));
                break;
            }
        }
    }


    public function deleteBy(array $where)
    {
    }

    public function delete(int $id)
    {
        $users = json_decode(file_get_contents('users.json'), true);
        foreach ($users as $key => $user) {
            if ($user['id'] == $id) {
                unset($users[$key]);

                if (file_exists('users.json')) {
                    unlink('users.json');
                }

                file_put_contents('users.json', json_encode($users));
                break;
            }
        }
    }

    public function find(int $id)
    {
        return $this->model::find($id);
    }


}
