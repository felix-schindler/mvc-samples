<?php

class UserController extends Controller
{
	protected array $paths = ['/users', '/users/:id'];

	protected function execute(): View
	{
		$id = $this->param('id');
		$layout = new LayoutView();
		
		if ($id) {
			try {
				$user = UserModel::get($id);
				if ($user === null) throw new Exception('User not found');
				$layout->addChild(new HeadingView($user->name));
				$layout->addChild(new UserSingleView($user));
			} catch (Exception $e) {
				return new ErrorView(500, message: $e->getMessage());
			}
		} else {
			try {
				$users = UserModel::getList();
				if ($users === null) throw new Exception('Welp. Something went wrong!');
				$layout->addChild(new HeadingView('Users'));
				$layout->addChild(new UserListView($users));
			} catch (Exception $e) {
				return new ErrorView(500, message: $e->getMessage());
			}
		}

		return $layout;
	}
}
