<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();
        $data['customers'] = $model->findAll();

        return view('customers/index', $data);
    }

    public function new()
    {
        return view('customers/new');
    }

    public function create()
    {
        helper(['form', 'url']);

        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'phone'     => 'permit_empty'
        ];

        if (! $this->validate($rules)) {
            return view('customers/new', [
                'validation' => $this->validator
            ]);
        }

        $model = new CustomerModel();
        $model->save([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/customers')->with('success', 'Customer created successfully!');
    }

    public function edit($id)
    {
        $model = new CustomerModel();
        $data['customer'] = $model->find($id);

        if (empty($data['customer'])) {
            return redirect()->to('/customers')->with('error', 'Customer not found.');
        }

        return view('customers/edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'phone'     => 'permit_empty'
        ];

        if (! $this->validate($rules)) {
            $model = new CustomerModel();
            return view('customers/edit', [
                'customer'   => $model->find($id),
                'validation' => $this->validator
            ]);
        }

        $model = new CustomerModel();
        $model->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to('/customers')->with('success', 'Customer updated successfully!');
    }

    public function delete($id)
    {
        $model = new CustomerModel();
        $model->delete($id);

        return redirect()->to('/customers')->with('success', 'Customer deleted successfully!');
    }
}