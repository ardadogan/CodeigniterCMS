<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {
	

	public function detail($pageId=false,$pageName=false)
	{
		# Controller
			$page 		= $this->db->where('pageId',$pageId)->get('pages')->row();
			$lang		= $this->db->where('pageId',$pageId)->where('languageId',$this->_lng->languageId)->get('pages_lang')->row();

			$data['page'] = new stdClass;

			$data['page']->pageId 		= $page->pageId;
			$data['page']->categoryId 	= $page->categoryId;
			$data['page']->image 		= $page->image;
			$data['page']->name 		= $lang->name;
			$data['page']->text 		= $lang->text;
			
			$data['category'] = $this->commonModel->getPageCategoryInfo($page->categoryId);


		# Show
			$this->header('page',$pageId);
				$this->load->view($this->app->template.'/pages/detail',$data);
			$this->footer();
	}
}