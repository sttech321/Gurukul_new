<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get user by email.
     *
     * @param string $email
     * @return array|null
     */
    public function get_user_by_email($email)
    {
        $query = $this->db->get_where('user', ['user_email' => $email]);
        return $query->row_array();
    }

    /**
     * Save the reset token for a user.
     *
     * @param int $user_id
     * @param string $token
     * @return bool
     */
    public function save_reset_token($user_id, $token)
    {
        $data = [
            'reset_token' => $token,
            'token_expires' => date('Y-m-d H:i:s', strtotime('+1 hour')) // Token valid for 1 hour
        ];
        $this->db->where('id', $user_id);
        return $this->db->update('user', $data);
    }

    /**
     * Get user by reset token.
     *
     * @param string $token
     * @return array|null
     */
    public function get_user_by_token($token)
    {
        $query = $this->db->get_where('user', [
            'reset_token' => $token,
            'token_expires >=' => date('Y-m-d H:i:s') // Ensure the token is not expired
        ]);
        return $query->row_array();
    }

    /**
     * Update the password for a user.
     *
     * @param string $email
     * @param string $newPassword
     * @return bool
     */


    public function update_password($email, $newPassword)
    {
        // Fetch the user by email to check the role
        $user = $this->get_user_by_email($email);

        if ($user) {
            // Depending on the role, update the password in the corresponding table
            switch ($user['role']) {
                case 'admin':
                    // Update password in the admin table
                    $this->db->where('email', $email);
                    $this->db->update('admin', ['password' => $newPassword]);
                    // Fetch the updated password
                    $updatedUser = $this->db->get_where('admin', ['email' => $email])->row_array();
                    echo "Updated Password: " . $updatedUser['password'];
                    break;

                case 'principal':
                    // Update password in the principal table
                    $this->db->where('email', $email);
                    $this->db->update('principal', ['password' => $newPassword]);
                    // Fetch the updated password
                    $updatedUser = $this->db->get_where('principal', ['email' => $email])->row_array();
                    echo "Updated Password: " . $updatedUser['password'];
                    break;

                case 'teacher':
                    // Update password in the teacher table
                    $this->db->where('email', $email);
                    $this->db->update('teacher', ['password' => $newPassword]);
                    // Fetch the updated password
                    $updatedUser = $this->db->get_where('teacher', ['email' => $email])->row_array();
                    echo "Updated Password: " . $updatedUser['password'];
                    break;
                    

                default:
                    echo "Role not found, no password updated.";
                    return false;
            }
            return true;
        }

        echo "User not found.";
        return false;
    }

    
}
