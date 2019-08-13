// @flow
import React, { Component } from 'react';
import { connect } from 'react-redux';
import {
	moveToArchiveAction,
	moveToActualAction,
	getNewsList,
	updateNewsAction
} from 'actions/data';
import ItemsList from 'components/ItemsList';
import dayjs from 'dayjs';

type Props = {
	data: Object,
	moveToArchiveAction: Function,
	getNewsList: Function,
	meta: Array<Object>,
	updateNewsAction: Function,
	list: Array<Object>,
	moveToActualAction: Function
};

export class ActualContainer extends Component<Props> {
	handleSaveItem = (data: Object) => {
		this.props.updateNewsAction('news', data);
	};

	componentDidMount() {
		this.props.getNewsList('news');
	}

	render() {
		return <ItemsList {...this.props} saveListItem={this.handleSaveItem} />;
	}
}

const mapStateToProps = state => ({
	list: state.data.news.map(item => ({
		...item,
		publishDate: dayjs(item.publishDate).format('YYYY-MM-DD')
	})),
	meta: state.data.meta.filter(item => item.code !== 'uuid')
});

export default connect(
	mapStateToProps,
	{ moveToArchiveAction, moveToActualAction, getNewsList, updateNewsAction}
)(ActualContainer);
