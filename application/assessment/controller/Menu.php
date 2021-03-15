<?php

namespace app\assessment\controller;

use think\Controller;
use app\assessment\logic\GetViewMenuPermission;

use app\assessment\model\Menu as MenuModel;
use app\assessment\model\Role;
use app\assessment\model\Permission;

// 菜单管理
class Menu extends Common{

    public function mList(){
        $menu = new MenuModel();
        $menu = $menu::all(function($query){
            $query->order('sort asc');
        });

        $treeArr = get_tree($menu);

        $this->assign('menu',$treeArr);


        $get = new GetViewMenuPermission();

        $viewMenu = $get->getViewMeun();


        $this->assign('viewMenu',$viewMenu);
        return view();
    }

    // 更新菜单
    public function publicSaveMenu($id = 0,$name = '',$is_menu = '',$module_name = '',$controller_name = '',$view_name = '',$sort = 0,$parent_id = 0){
        $menu = new MenuModel();
        $role = new Role();
        $permission = new Permission();
        if(request()->isPost()){

            $role_id   = session('user.role_id');
            $user_id   = session('user.id');

            if($id != 0){
                $menu = $menu::get($id);
            }

            $data['name']              = input('post.name');
            $data['module_name']       = input('post.module_name');
            $data['controller_name']   = input('post.controller_name');
            $data['view_name']         = input('post.view_name');
            $data['is_menu']           = input('post.is_menu');
            $data['parent_id']         = input('post.parent_id');
            $data['sort']              = input('post.sort');
            $data['user_id']           = $user_id;

            if($menu->save($data) == 1){
                if($role_id == 1){
                    $res = $permission->where(['role_id'=>$role_id,'menu_id'=>$id])->find();
                    if($res <> 1){
                        $menu_id   = $menu->id;
                        $permission->role_id = $role_id;
                        $permission->menu_id = $menu_id;
                        $permission->save();
                    }
                }

                return success('保存成功',url('mlist'));
            }
        }else{
            $data = [
                'id'               => $id,
                'name'             => $name,
                'is_menu'          => $is_menu,
                'module_name'      => $module_name,
                'controller_name'  => $controller_name,
                'view_name'        => $view_name,
                'sort'             => $sort,
                'parent_id'        => $parent_id,
            ];
            $this->assign('getInfo',$data);
            $menu = $menu::all(function($query){
                $query->where('is_menu',1)->order('sort asc');
            });

            $treeArr = get_tree($menu);

            $this->assign('menuinfo',$treeArr);
            return view();
        }

    }

    // 删除menu
    public function delMenu(){
        $id = input('post.id');

        // 软删除
        $menu = new MenuModel();
        $res = $menu::destroy($id);
        if($res == 1){
            $permission = new Permission();
            $role_id    = session('user.role_id');
            $permission->where(['role_id'=>$role_id,'menu_id'=>$id])->delete();

            echo json_encode(['status'=>'success','code'=>200,'msg'=>'删除成功']);
        }else{
            echo json_encode(['status'=>'error','code'=>201,'msg'=>'删除失败']);
        }
    }
}
