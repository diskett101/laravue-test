import NotFoundPageComponent from './components/NotFoundPageComponent';
import ArticleListComponent from './components/ArticleListComponent';
import ArticleCreateComponent from './components/ArticleCreateComponent';
import ArticleEditComponent from './components/ArticleEditComponent';

export default {
	mode: 'history',
	routes: [
		{
			path: "/",
			component: ArticleListComponent,
			name: "article-list",
		},
		{
			path: "/create",
			component: ArticleCreateComponent,
			name: "article-create",
		},
		{
			path: "/edit/:id",
			component: ArticleEditComponent,
			name: "article-edit",
		},
		{
			path: "*",
			component: NotFoundPageComponent,
			name: "not-found-page"
		}
	]
}
