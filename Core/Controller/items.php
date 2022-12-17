<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Model\item;

class items extends Controller
{

    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->auth();
        $this->admin_view(true);
    }

    /**
     * Gets all items
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['item:read']);
        $this->view = 'items.index';
        $item = new item; // new modelitem.
        $this->data['items'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
    }

    public function single()
    {
        $this->permissions(['item:read']);
        $this->view = 'ps.single';
        $item = new item();
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }

    /**
     * Display the HTML form for item creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['item:create']);
        $this->view = 'items.create';
    }

    /**
     * Creates new item
     *
     * @return void
     */
    public function store()
    {
        $this->permissions(['item:create']);
        $item = new item();
        $item->create($_POST);
        Helper::redirect('/items');
    }

    /**
     * Display the HTML form for item update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['item:read', 'item:update']);
        $this->view = 'items.edit';
        $item = new item();
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }

    /**
     * Updates the item
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['item:read', 'item:update']);
        $item = new item();
        $item->update($_POST);
        Helper::redirect('/item?id=' . $_POST['id']);
    }

    /**
     * Delete the item
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['item:read', 'item:delete']);
        $item = new item();
        $item->delete($_GET['id']);
        Helper::redirect('/items');
    }
}
