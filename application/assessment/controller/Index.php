<?php
namespace app\assessment\controller;

use think\Request;
use think\Db;
use app\assessment\model\Menu;
use app\assessment\model\Website;

class Index extends Common{

		public function index(){
				$website = new Website();
				$website = $website->where('id',1)->find();

				$role_id   = session('user.role_id');

				$menu = Db::view('Permission p','role_id,menu_id')
										->view('Menu m','id,name,module_name,controller_name,view_name,parent_id,is_menu,sort','p.menu_id = m.id')
										->where('p.role_id','=',$role_id)
										->where('m.is_menu','=',1)
									->order('m.sort asc')
									->select();
				$treeArr = get_tree_left($menu);

				$this->assign('menu',$treeArr);
				$this->assign('website',$website);

				return view();
		}

		public function content(){
				return view();
		}

}
