<?php

class Home_Model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();
    }

    public function add_customers($data){
        $this->db->insert('mt_customers',$data);
        return true;
    }
	
	
	
	
	
	
    public function check_login($email, $password)
    {
        $password_encrypt = md5($password);
        $this->db->select('*')->from('users')->where('email ', $email)->where('password', $password_encrypt);
        return $this->db->get();

    }
    
    public function get_menus()
    {
        $this->db->select('*')->from('menus');
        return $this->db->get();
    }
    
    public function add_menu($data){
        $this->db->insert('menus',$data);
        return true;
    }
    
    public function edit_menu($data){
        $data1 = array('title'=>$data['title'],'description'=>$data['description']);
        $this->db->where('id', $data['id']);
        $this->db->update('menus' ,$data1);
        return true;
    }
    
    public function get_contents()
    {
        $this->db->select('c.*,m.title as menu_name')->from('page_contents c')->join('menus m', 'm.id = c.menu_id')->order_by('c.menu_id');
        return $this->db->get();
    }
        
    public function add_content($data){
        $this->db->insert('page_contents',$data);
        return true;
    }
    
    public function edit_content($data){
        $data1 = array('title'=>$data['title'],'menu_id'=>$data['menu_id'],'page_type'=>$_POST['page_type'],'page_content'=>json_encode($_POST['description']),'page_no'=>$_POST['page_no'],'image'=>$_POST['image']);
        $this->db->where('id', $data['id']);
        $this->db->update('page_contents' ,$data1);
        return true;
    }
    
    public function get_contents_home()
    {
        $this->db->select('c.*,m.title as menu_name')->from('page_contents c')->join('menus m', 'm.id = c.menu_id')->where('c.menu_id',1)->where('c.page_type','Video');
        return $this->db->get();
    }
    
    public function get_videos()
    {
        $this->db->select('c.*,m.title as menu_name')->from('videos c')->join('page_contents m', 'm.id = c.page_id')->order_by('c.page_id');
        return $this->db->get();
    }
        
    public function add_video($data){
        $this->db->insert('videos',$data);
        return true;
    }
    
    public function edit_video($id,$data){
        $this->db->where('id', $id);
        $this->db->update('videos' ,$data);
        return true;
    }
    
    public function get_contents_questions()
    {
        $this->db->select('c.*')->from('page_contents c')->like('c.page_type','Question');
        return $this->db->get();
    }
    
    public function get_questions()
    {
        $this->db->select('q.*,p.title,c.name')->from('questions q')->join('page_contents p','p.id = q.page_id')->join('question_category c','c.id = q.category')->order_by('c.id');
        return $this->db->get();
    }
    
    public function get_questions_category()
    {
        $this->db->select('q.*')->from('question_category q');
        return $this->db->get();
    }
    
    public function add_question($data){
        $this->db->insert('questions',$data);
        return true;
    }
    
    public function edit_question($id,$data){
        $this->db->where('id', $id);
        $this->db->update('questions' ,$data);
        return true;
    }
    
    public function add_question_category($data){
        $this->db->insert('question_category',$data);
        return true;
    }
    
    public function edit_question_category($id,$data){
        $this->db->where('id', $id);
        $this->db->update('question_category' ,$data);
        return true;
    }
    
    public function get_users()
    {
        $this->db->select('c.*')->from('users c');
        return $this->db->get();
    }
    
    public function get_users_enroll()
    {
        $this->db->select('c.*,m.title as menu_name')->from('page_contents c')->join('menus m', 'm.id = c.menu_id')->where('c.menu_id',1);
        return $this->db->get();
    }
    
    public function edit_user($data){
        $this->db->where('id', $data['id']);
        $this->db->update('users' ,$data);
        return true;
    }
    
    public function get_visitors()
    {
        $this->db->select('*,count(date) as day_count,date_format(date,"%Y-%m-%d") as date')->from('visitors')->group_by('date_format(date,"%Y-%m-%d")');
        return $this->db->get();
    }
    
    public function get_ranks()
    {
        return $this->db->query('SELECT r.user_id,r.mark,u.first_name,r.date,q.name,r.question_category FROM `rank` r left join users u on u.id = r.user_id left join question_category q on q.id = r.question_category group by r.user_id,r.question_category order by r.question_category');
        //return $this->db->get();
    }
    
    public function get_affairs()
    {
        $this->db->select('c.*')->from('affairs c');
        return $this->db->get();
    }
    
    public function add_affair($data){
        $this->db->insert('affairs',$data);
        return true;
    }
    
    public function edit_affair($id,$data){
        $this->db->where('id', $id);
        $this->db->update('affairs' ,$data);
        return true;
    }
    
    public function get_tests()
    {
        $this->db->select('c.*,p.title as name')->from('tests c')->join('page_contents p','p.id = c.category')->order_by('c.category,c.type');
        return $this->db->get();
    }
    
    public function add_test($data){
        $this->db->insert('tests',$data);
        return true;
    }
    
    public function edit_test($id,$data){
        $this->db->where('id', $id);
        $this->db->update('tests' ,$data);
        return true;
    }
    
    public function get_answers(){
        $this->db->select('a.*,t.title,u.first_name,u.email,p.title as name')->from('answers a')->join('tests t','t.id=a.test_id')->join('users u','u.id = a.user_id')->join('page_contents p','p.id=t.category');
        return $this->db->get();
    }


}
