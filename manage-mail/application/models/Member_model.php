<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
  public function getMember()
  {
    $query = "SELECT `user`.*, `user_role`.`role`, `user_bagian`.`bagian`
    FROM `user`
    JOIN `user_role` 
    ON `user`.`role_id` = `user_role`.`id`
    JOIN `user_bagian` 
    ON `user`.`bagian_id` = `user_bagian`.`id`
      ";
    return $this->db->query($query)->result_array();
  }
}
