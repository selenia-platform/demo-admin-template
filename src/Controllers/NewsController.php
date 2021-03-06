<?php
namespace SeleniaTemplates\DemoAdmin\Controllers;

use Electro\ViewEngine\Lib\ViewModel;
use Selenia\Platform\Components\Base\PageComponent;
use SeleniaTemplates\DemoAdmin\Models\Article;

class NewsController extends PageComponent
{
  public $template = <<<'HTML'
<Import service="navigation"/>

<AppPage>
  <GridPanel>

    <DataGrid data={news} as="i:r" onClickGoTo={navigation.article + r.id} multiSearch>
      <Column width="100" title="Published" align="center" type="field">
        <Checkbox checked={r.published} disabled/>
      </Column>
      <Column width="100%" title="Title">
        {r.title}
      </Column>
      <Column width="145" title="Date">
        {r.date}
      </Column>
      <Column width="145" title="Creation date">
        {r.creation_date}
      </Column>
    
      <Actions>
        <ButtonNew/>
        <ButtonPrint/>
        <ButtonDelete/>
        <Button icon="ion-funnel" class="btn-link ActionFilter" script="$('.multiSearch').toggle()"/>
      </Actions>
    </DataGrid>
  </GridPanel>
    
</AppPage>
HTML;

  protected function viewModel (ViewModel $viewModel)
  {
    $viewModel->news = Article::all();
  }

}
