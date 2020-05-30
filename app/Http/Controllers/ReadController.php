<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class ReadController extends Controller
{   

    public function index() {
        return view("read.index");
    }

    public function post($id) {
        $posts = [];
        $posts[1] = '
        <div align="center" class="banner-post">
                <img class="img-fluid" alt="" title="5 investimentos que rendem mais que a poupança" src="https://public-assets-bmg.s3.amazonaws.com/contaespecialista.com.br/img/news/0068/000-conteudo-v1.jpg">
        </div>
        <article>
        <h1 class="titulo">5 investimentos que rendem mais que a poupança</h1>
        <div class="conteudo">
            <div>Embora seja a aplicação financeira mais famosa do Brasil, a poupança <span style="font-weight: bold;">já não é mais tão vantajosa como foi na década de 90</span>, quando rendia 14% ao ano. Conhecida como um investimento financeiro, isto é, uma forma de guardar dinheiro e deste obter rendimentos, hoje a poupança rende apenas <span style="font-weight: bold;">70% da taxa básica de juros da economia</span>, a Selic, quando esta fica abaixo de 8,5% ao ano.</div><div></div><div>A taxa Selic foi fixada em 3% pelo Comitê de Política Monetária (Copom), neste mês de maio. Isso significa que a aplicação mantida na poupança nova (após maio de 2012) rende somente 2,1% ao ano, <span style="font-weight: bold;">uma das rentabilidades mais baixas entre os investimentos de renda fixa</span>. Se você tem dinheiro na poupança e deseja ter mais rentabilidade, com segurança, confira 5 investimentos mais vantajosos que a poupança:</div><div></div><h3><span style="font-weight: bold;">1. CDB</span></h3><div></div><div>O CDB – Certificado de Depósito Bancário – se revela uma <a href="https://www.bancobmg.com.br/site/investimento/" target="_blank">ótima alternativa à poupança</a>. Por sua simplicidade, <span style="font-weight: bold;">este investimento é recomendado para iniciantes e para investidores experientes</span> Um CDB de curto prazo, com liquidez diária, pode render cerca de 100% do CDI (Certificado de Depósito Interbancário – títulos emitidos por bancos como forma de captação de recursos). Mas, conforme o prazo estabelecido para o investimento, o rendimento do CDB pode chegar a mais de 120% do CDI.</div><div></div><div>Todos os CDBs têm proteção do Fundo Garantidor de Créditos (FGC), até o limite de R$ 250 mil por CPF ou CNPJ. Se você deseja ter mais informações sobre o FGC, acesse: http://www.fgc.org.br.</div><div></div><h3><span style="font-weight: bold;">2. Tesouro Direto</span></h3><div></div><div>O Tesouro Direto é bastante semelhante ao CDB, no entanto, a diferença é que o emissor não é um banco, mas sim, o próprio Governo Federal. Por isso, esse é <span style="font-weight: bold;">um investimento muito seguro</span>, por contarem com a segurança do Tesouro Nacional.</div><div>O valor mínimo para investir no Tesouro Direto é mais baixo do que outros ativos de renda fixa, podendo-se iniciar os investimentos com R$30. O Tesouro Direto possui três frentes de investimento:&nbsp;</div><div></div><div><span style="font-weight: bold;">Tesouro Selic</span> (Investimento de curto prazo, rende a taxa Selic);</div><div><span style="font-weight: bold;">Tesouro IPCA</span> (Investimento de médio e longo prazo, rende conforme a inflação + taxa);</div><div><span style="font-weight: bold;">Tesouro Prefixado</span> (Investimento com uma taxa prefixada que não é alterada).</div><div></div><h3><span style="font-weight: bold;">3. LCI</span></h3><div></div><div>A Letra de Crédito Imobiliária (LCI) é uma forma de capitalizar o segmento imobiliário no Brasil com dinheiro de investidores. Além de <span style="font-weight: bold;">contar com boa rentabilidade</span>, em comparação com a poupança, essa modalidade tem dois atrativos: um deles é o incentivo do governo, que <span style="font-weight: bold;">isenta a cobrança de Imposto de Renda</span> no resgate, e o outro é a proteção do FGC.&nbsp;</div><div></div><h3><span style="font-weight: bold;">4.&nbsp; LCA&nbsp;</span></h3><div></div><div>Enquanto a LCI é destinada ao segmento imobiliário, a LCA é a Letra de Crédito do Agronegócio. Essa modalidade de investimento é responsável por <span style="font-weight: bold;">captar recursos para o setor de agronegócio brasileiro</span>.</div><div></div><div>A LCA, como a LCI, também é isenta de Imposto de Renda, como incentivo do governo a este tipo de investimento, e tem a <span style="font-weight: bold;">garantia do Fundo Garantidor de Créditos</span> até R$ 250 mil por CPF ou CNPJ.&nbsp;</div><div></div><h3><span style="font-weight: bold;">5. Debêntures</span></h3><div></div><div>Semelhantemente ao Tesouro Direto e os CDBs, os debêntures também são títulos de dívida. Nesse caso, no entanto, <span style="font-weight: bold;">os emissores são empresas de capital, aberto ou fechado,</span> que precisam obter recursos para os seus projetos.</div><div></div><div>Há dois tipos de debêntures: a simples (ou não-conversível em ações) e a conversível em ações. Embora sejam investimentos mais complexos do que a poupança, <span style="font-weight: bold;">o rendimento é muito superior</span> e, assim como no Tesouro Direto, os juros podem ser prefixado, pós-fixado e híbridos.&nbsp;</div><div></div><div>Vale destacar, por fim, que todos esses<span style="font-weight: bold;"> investimentos alternativos à poupança são muito simples de aderir</span>. O Super Poup, CDB do Banco BMG, por exemplo, pode ser gerenciado e acompanhado facilmente pelo aplicativo meu_BMG. <a href="https://www.superpoup.com.br/" target="_blank">O Super Poup rende 104% da Selic </a>e <span style="font-weight: bold;">quanto mais tempo o recurso fica nele, maior será o retorno. </span>Em dois anos, por exemplo, o investimento renderá 27% a mais do que a Selic.&nbsp;</div><div></div>							</div>
    </article>';
        $posts[2] = '
        <div align="center" class="banner-post">
                <img class="img-fluid" alt="Como organizar as finanças" title="Como organizar as finanças?" src="https://public-assets-bmg.s3.amazonaws.com/contaespecialista.com.br/img/news/0046/organizar-financas-1180.png">
        </div>
        <article>
        <h1 class="titulo">Como organizar as finanças?</h1>
        <div class="conteudo">
            <div>De acordo com um recente relatório do Serasa Experian, <span style="font-weight: bold;">um em cada cinco brasileiros estão inadimplentes</span>. Além disso, há no país, pelo menos, 62,4 milhões de CPFs negativados, segundo a Confederação Nacional dos Dirigentes Lojistas (CNDL) e o Serviço de Proteção ao Crédito (SPC).</div><div></div><div>Qual a solução para quem está nesta situação? É possível falar em <a href="https://www.contaespecialista.com.br/educacao-financeira/" target="_blank">planejamento financeiro</a> quando 80% (SPC) da população brasileira vive no limite do seu orçamento? Claro que sim! Planejamento e conhecimento ainda são grandes aliados de quem almeja ter uma vida financeira saudável. Confira dicas de como organizar as finanças:</div><div></div><div><span style="font-weight: bold;">Entenda.</span> O primeiro passo para colocar a <span style="font-weight: bold;">vida financeira em ordem é entender o tamanho da dívida e renegociar</span>. Por isso, calcule todas as pendências e quanto de dinheiro entra. Se o seu objetivo é negociar e pagar as dívidas à vista, uma das opções de empréstimo podem ajudar nesse momento.&nbsp;</div><div></div><div><span style="font-weight: bold;">Conheça.</span> Aprender a colocar as <span style="font-weight: bold;">próprias contas em um controle financeiro pessoal ou doméstico é muito importante para a tomada de decisões</span> quando o salário cai na conta. Por isso, busque informações para gastar e aplicar seu dinheiro de forma correta.</div><div></div><div><span style="font-weight: bold;">Priorize. </span>Quais são seus gastos fixos, que você não pode abrir mão? Coloque tudo em uma lista e separe os que não são tão importantes. Assim, você estará destacando o que é, de fato, prioridade no pagamento das dívidas, e será mais fácil entender onde cortar gastos.&nbsp;</div><div></div><div><span style="font-weight: bold;">Movimente.</span> Se o seu salário não está sendo suficiente, é hora de começar a fazer dinheiro. Oferecer roupas, aparelhos eletrônicos, eletrodomésticos, livros e até comidas (bolos, doces e quitutes) para parentes, vizinhos e amigos é uma boa saída para conseguir um <a href="https://help.com.br/produtos/dinheiro-extra/" target="_blank">dinheiro extra</a>. A ideia é que esse valor seja guardado para unir ao salário. Volte à sua listinha de prioridades e comece a pagar as contas.</div><div></div><div>Esses passos exigem esforço e força de vontade para nadar contra a maré. Mas, em algum momento é preciso começar para, então, deixar de fazer parte das estatísticas dos milhões inadimplentes no Brasil. Vamos começar a mudar sua vida financeira hoje?&nbsp;&nbsp;</div><div></div>							</div>
    </article>';
    $posts[3] = '
    <div align="center" class="banner-post">
            <img class="img-fluid" alt="Como aumentar o score de crédito?" title="Como aumentar o score de crédito?" src="https://public-assets-bmg.s3.amazonaws.com/contaespecialista.com.br/img/news/0045/aumentar-score-credito-1180.png">
    </div>
    <article>
    <h1 class="titulo">Como aumentar o score de crédito?</h1>
    <div class="conteudo">
        <div>Você já ouviu falar sobre o <a href="https://www.contaespecialista.com.br/educacao-financeira/voce-sabe-o-que-e-score-de-credito" target="_blank">score de crédito</a>? Se ao fazer um empréstimo você notou que os juros estavam altos; ou se ao pedir um financiamento você teve a sua solicitação negada, mesmo pagando todas as compras à vista no dinheiro, certamente foi devido ao score.&nbsp;</div><div></div><div>De maneira simplificada, o score de crédito é o índice que aponta o quão boa consumidora e pagadora uma pessoa é. De acordo com o menor risco de inadimplência, os <span style="font-weight: bold;">melhores scores começam a partir de 700 pontos</span>.</div><div></div><div>Mas, a partir de 400 pontos, o risco de atraso já é bem menor, e esta pode ser considerada uma boa média de score de crédito. Se você constatou que o seu score está baixo, algumas ações podem contribuir para o aumento da pontuação, veja:</div><div></div><div><span style="font-weight: bold;">Limpe seu nome.</span> A primeira <span style="font-weight: bold;">atitude para aumentar o score deve ser limpar o nome, caso o seu CPF esteja negativado</span>. Entrar em contato com as empresas devedoras e renegociar as dívidas é fundamental.</div><div></div><div><span style="font-weight: bold;">Forme um bom histórico. </span>Após renegociar as dívidas, torne-se um bom pagador. O histórico de pagamento do consumidor é o principal fator na hora de atribuir ou subtrair pontos do score. Dessa forma, observe os prazos de vencimentos e <span style="font-weight: bold;">priorize o pagamento integral das faturas</span>.&nbsp;</div><div></div><div><span style="font-weight: bold;">Mantenha seus dados atualizados.</span> Existem diferentes bancos de score no Brasil, essas empresas medem a capacidade de pagamento dos consumidores brasileiros. Por isso, para garantir um bom score, é necessário manter todos os dados cadastrais atualizados nessas plataformas.&nbsp;</div><div></div><div><span style="font-weight: bold;">Evite solicitar diferentes créditos. </span>É importante <span style="font-weight: bold;">evitar abrir muitas contas de uma única vez</span>, assim como solicitar diferentes cartões de crédito. O motivo é que a consulta constante ao CPF interfere na pontuação do seu score, uma vez que a alta procura pode indicar risco de atraso.&nbsp;</div><div></div>							</div>
    </article>';
    
    $data = [];

    if($id){
        if(array_key_exists($id,$posts)){
            $data["post"] = $posts[$id];
        } else {
            $data["post"] = "Esse conteúdo não existe!";
        }
    } else {
        $data["post"] = "Esse conteúdo não existe!";
    }

        return view("read.post",$data);
    }
}
