<?php

class UserModel extends Model
{
  /**
   * @return User|null User data
   * @throws Exception
   */
  public static function get(string $id): ?User
  {
    // Open new db connection
    $db = new Database();

    // Execute query
    $success = $db->execute('SELECT id, name, bio FROM users WHERE id=:id;', [':id' => $id]);

    // Return user data
    if ($success && ($userData = $db->fetch()) != null) {
      return User::from($userData);
    }

    // Throw exception if user not found
    throw new Exception('User not found');
  }

  /**
   * @return array<User>|null Users data
   * @throws Exception
   */
  public static function getList(): ?array
  {
    // Open new db connection
    $db = new Database();

    // Execute query
    $success = $db->execute('SELECT id, name, bio FROM users;');

    if ($success) {
      // Return users data
      $usersData = $db->fetchAll();

      $users = [];
      foreach ($usersData as $userData) {
        $users[] = User::from($userData);
      }
      return $users;
    }

    // Throw exception if no users found
    throw new Exception('No users found');
  }

  public static function create(User $user): bool
  {
    // Open new db connection
    $db = new Database();

    // Execute query and return result
    return $db->execute('INSERT INTO users (id, name, bio) VALUES (:id, :name, :bio)', [
      ':id' => $user->id,
      ':name' => $user->name,
      ':bio' => $user->bio,
    ]);
  }
}
