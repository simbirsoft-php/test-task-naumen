// @flow
import React, { Component, Fragment } from 'react';
import { connect } from 'react-redux';
import Container from '@material-ui/core/Container';
import AppBar from '@material-ui/core/AppBar';
import Tabs from '@material-ui/core/Tabs';
import Tab from '@material-ui/core/Tab';

import Actual from 'containers/Actual';
import Archive from 'containers/Archive';
import { getMetaList } from 'actions/data';
import styles from './App.less';

type State = {
	activeTab: number
};

export class App extends Component<{ getMetaList: Function }, State> {
	state = {
		activeTab: 0
	};

	componentDidMount() {
		this.props.getMetaList('news');
	}

	handleChange = (event: SyntheticEvent<>, activeTab: number) => {
		this.setState({
			activeTab
		});
	};

	render() {
		return (
			<Fragment>
				<AppBar color='default'>
					<Container maxWidth='xl'>
						<Tabs
							value={this.state.activeTab}
							onChange={this.handleChange}
							indicatorColor='primary'
							textColor='primary'
							centered
						>
							<Tab label='Актуальное' />
							<Tab label='Архив' />
						</Tabs>
					</Container>
				</AppBar>
				<Container maxWidth='xl' className={styles.content}>
					<div>
						{this.state.activeTab === 0 ? (
							<Actual />
						) : (
							<Archive />
						)}
					</div>
				</Container>
			</Fragment>
		);
	}
}

export default connect(
	null,
	{ getMetaList }
)(App);
