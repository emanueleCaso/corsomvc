<?php

namespace controllers\dbp;

use framework\Controller;
use views\dbp\NavigationBar as NavigationBarView;
use framework\classes\Common;
class NavigationBar extends Controller
{

    protected function autorun($parameters = null)
    {
        $this->view = new NavigationBarView();
        // $path = Common::PathToRoot();
    }

}