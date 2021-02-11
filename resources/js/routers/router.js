/*
* configure vue router
*/
import Vue from 'vue'
import Router from 'vue-router';
Vue.use(Router);
import LandingComponent from '../components/public/landing-page/LandingPage.vue';
import DashboardComponent from '../components/public/dashboard/Dashboard.vue';
import emailwidgetsComponent from '../components/public/email-widgets/Emailwidgets.vue';

import IntegrationsComponent from '../components/public/integrations/Integrations.vue';
import SupportComponent from '../components/public/more/Support.vue';
import OfferComponent from '../components/public/more/Offer.vue';
import InstallComponent from '../components/public/more/Install.vue';
import UninstallComponent from '../components/public/more/Uninstall.vue';
import LoginComponent from '../components/public/login/Login.vue';
import WelcomeComponent from '../components/public/install-app/Welcome.vue';
import GetreadyComponent from '../components/public/install-app/Getready.vue';
import SubscriptionplansComponent from '../components/public/install-app/Subscriptionplans.vue';
import HelpsupportComponent from '../components/public/help-support/Helpsupport.vue';
import FaqComponent from '../components/public/help-support/Faq.vue';
import ThemeintegrationComponent from '../components/public/theme_integration/Themeintegration.vue';
import SettingThemesComponent from "../components/public/settings/SettingTheme.vue";
import SettingAccountsComponent from "../components/public/settings/AccountSettings.vue";
import ContactsupportComponent from "../components/public/contact-support/Contactsupport.vue"
import ProfileComponent from "../components/public/profile/Profile.vue"
import RecommendedAppsComponent from "../components/public/recommended-apps/RecommendedApps.vue"

import config from "../config";
const router = new Router({
	mode: 'history',
	base: config.URL_PREFIX,
	routes: [
		{
			path: '/',
			redirect: '/login',
			meta: {
				layout: "outer",
				isPublic: false
			}
		},
		{
			path: '/login',
			component: LoginComponent,
			meta: {
				layout: "outer",
				isPublic: false
			}
		},
		{
			path: '/autologin',
			component: LandingComponent,
			meta: {
				layout: "no-sidebar",
				isPublic: false
			},
		},
		{
			path: '/dashboard',
			component: DashboardComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Dashboard"
			},
		},
		{
			path: '/email-widgets',
			component: emailwidgetsComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Email Widgets"
			}
		},
		{
			path: '/integrations',
			component: IntegrationsComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Integrations"
			}
		},
		{
			path: '/support',
			component: SupportComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Support"
			}
		},
		{
			path: '/offer',
			component: OfferComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Offer"
			}
		},
		{
			path: '/install',
			component: InstallComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Install"
			}
		},
		{
			path: '/uninstall',
			component: UninstallComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Uninstall"
			}
		},
		{
			path: '/welcome',
			component: WelcomeComponent,
			meta: {
				layout: "outer",
				isPublic: true,
				title: "Welcome"
			}
		},
		{
			path: '/getready',
			component: GetreadyComponent,
			meta: {
				layout: "outer",
				isPublic: true,
				title: "Get Ready"
			}
		},
		{
			path: '/subscription-plans',
			component: SubscriptionplansComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Subscription Plans"
			}
		},
		{
			path: '/help-support',
			component: HelpsupportComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Help Support"
			}
		},
		{
			path: '/faq',
			component: FaqComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "FAQ"
			}
		},
		{
			path: '/theme-integration',
			component: ThemeintegrationComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "App Setup"
			}
		},
		{
			path: '/settings/theme',
			component: SettingThemesComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Theme Settings"
			}
		},
		{
			path: '/settings/account',
			component: SettingAccountsComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Account Settings"
			}
		},
		{
			path: '/contact-support',
			component: ContactsupportComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Contact Support",
			}
		},
		{
			path: '/profile',
			component: ProfileComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Profile",
			}
		},
		{
			path: '/recommended-apps',
			component: RecommendedAppsComponent,
			meta: {
				layout: "inner",
				isPublic: true,
				title: "Recommended Apps",
			}
		},
	],
	scrollBehavior(to, from, savedPosition) {
		return { x: 0, y: 0 };
	}
})

router.beforeEach((to, from, next) => {
	if (to.matched.some(record => record.meta.isPublic)) {
		const currentStore = JSON.parse(window.localStorage.getItem("pzs_current_Store"))
		const access_token = JSON.parse(window.localStorage.getItem("pzs_access_token"))
		if (currentStore && access_token) {
			next()
		} else {
			next({
				path: "/login"
			})
		}
	}
	next()
});

export default router; 
