<?php
namespace INUtils\Entity;

abstract class WPPostEntity implements WPPostInterface
{
    /**
     * 
     * @var int
     */
    private $id;
    
    /**
     * 
     * @var string
     */
    private $content;
    
    /**
     * 
     * @var string
     */
    private $permalink;
    
    /**
     * 
     * @var string
     */
    private $image;
    
    /**
     * 
     * @var string
     */
    private $type;
    
    /**
     * 
     * @var string
     */
    private $title;
    
    /**
     * 
     * @var string
     */
    private $date;
    
    /**
     * @return the $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return the $permalink
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @return the $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return the $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }


     /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    
    function __construct($postId){
        $post = get_post($postId);
        
        $this->id = $post->ID;
        $this->content = $post->post_content;
        $this->permalink = get_permalink($this->id);
        $this->image = wp_get_attachment_url(get_post_thumbnail_id($this->id));
        $this->type = $post->post_type;
        $this->title = $post->post_title;
        $this->date = $post->post_date;
        $this->post = $post;
    }
    
    /**
     * 
     * @param string $fieldName
     * @return mixed
     */
    public function getMetaField($fieldName){
        return get_post_meta($this->id, $fieldName, true);
    }
    
    /**
     * 
     * @param string $fieldName
     * @param string $fieldValue
     */
    public function setMetaField($fieldName, $fieldValue){
        update_post_meta($this->id, $fieldName, $fieldValue);
    }
    
    
    /**
     * 
     * @param string $format
     * @return Ambigous <string, number, boolean, mixed>
     */
    public function getFormattedDate($format = "j M Y"){
        return mysql2date($format, $this->date);
    }
    
}