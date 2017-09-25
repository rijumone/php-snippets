<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
/*

Coding Challenge: Build a REST API using PHP, MySQL &amp; In Memory Cache
Q: Create a REST API over JSON in PHP to receive 10 parameters and store it in MySQL
database. You can either use PHP7 or Laravel.
You have to take care of below scenarios while building this modules:
1. Parameter&#39;s detail is as follows:
id integer,
name string,
age integer,
productId integer,
company string,
address string,
mobile integer,
email string,
height float,
weight float
2. id, name, category, email are mandatory parameters. Respond back with a descriptive error
in case any one of them is missing. Remaining parameters are optional.
3. The api must have authentication check (Use any authentication technique), and it should not
insert data from unauthorized requests.
4. Store the productId and productName mapping in cache (Use any cache mechanism to like
Redis, Memcache etc.). Fetch productName on basis of productId from the cache and store it in
MySQL table along with other 10 parameters.
5. One copy mapping should be present on MySQL and the cache should be in-sync with it.

Your code will be judged primarily on:
a. Performance: API Response Time
b. Code: Cleanliness, Structure/Design, Bugs
d. Backend: MySQL Table Design

*/