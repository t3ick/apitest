<?php

class Mailer_model extends CI_Model
{
    protected $CI;

    public function MailerData() {
        $this->CI =& get_instance();
        if (empty(get_instance()->db)) {
            get_instance()->db = $this->CI->load->database('default', true);
        }

        $lang = $this->db->select('lang_id')
            ->from('domain_lang')
            ->get()
            ->result();

        for ($i = 0; isset($lang[$i]); $i++) {
            $rep->langs[$i] = $lang[$i]->lang_id;
        }

        $domain = $this->db->select('id, slug, name, description, created_at')
            ->where('id', 1)
            ->from('domain')
            ->get()
            ->result();

        $rep->id = $domain[0]->id;
        $rep->slug = $domain[0]->slug;
        $rep->name = $domain[0]->name;
        $rep->decription = $domain[0]->description;

        $user = $this->db->select('id, username')
            ->where('id', 1)
            ->from('user')
            ->get()
            ->result();

        $rep->creator = $user[0];

        $rep->created_at = str_replace(' ', 'T',$domain[0]->created_at.'+01:00');

        return ($rep);
    }
}