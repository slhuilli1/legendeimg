 <?php
	defined('_JEXEC') or die('Access deny');
	
	class plgContentLegendeImg extends JPlugin 
	{
		function onContentPrepare($content, $article, $params, $limit){	
			$document = JFactory::getDocument();
			$document->addStyleSheet('plugins/content/legendeimg/style.css');			
			$re = '/(<img[^>]*alt="([^"]+)"[^>]*>)/U';
			preg_match_all($re, $article->text, $matches, PREG_SET_ORDER, 0);
			foreach($matches as $uneimage)
			{
				$article->text = str_replace($uneimage[0],"<figure class=\"figure-seo\">\r\n\t".$uneimage[0]."\r\n\t<figcaption>".$uneimage[2]."</figcaption>\r\n</figure>",$article->text);
			}
		}	
	}
?>