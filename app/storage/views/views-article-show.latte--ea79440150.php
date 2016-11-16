<?php
// source: D:\demos\myMVC\app\controllers/../views/article/show.latte

use Latte\Runtime as LR;

class Templateea79440150 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		if ($articles) {
?><ul>
    <?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($articles) as $article) {
?>

    <li id="article-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 3 */ ?>"><?php echo LR\Filters::escapeHtmlText($article['title']) /* line 3 */ ?> <?php
				echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $article['Author']['fullname'])) /* line 3 */ ?>   </li>
<?php
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
			?></ul><?php
		}
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['article'])) trigger_error('Variable $article overwritten in foreach on line 2');
		
	}

}
