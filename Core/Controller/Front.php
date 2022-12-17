<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\item;


class Front extends Controller
{
    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->admin_view(false);
    }

    /**
     * List all news
     *
     * @return void
     */
    public function index()
    {
        $this->view = 'home';
        $item = new item();
        $this->data['items'] = $item->get_all();
    }

    public function single()
    {
        $this->view = 'single';
        $item = new item();
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }
}
