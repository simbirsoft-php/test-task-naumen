// @flow
import React, { Component } from 'react';
import { connect } from 'react-redux';
import { moveToActualAction, getArchiveList } from 'actions/data';
import ItemsList from 'components/ItemsList';
import dayjs from 'dayjs';

type Props = {
	data: Object,
	moveToActualAction: Function,
	meta: Array<Object>,
	getArchiveList: Function,
	list: Array<Object>,
	moveToArchiveAction: Function,
	saveListItem?: Function
};

export class ArchiveContainer extends Component<Props> {
	componentDidMount() {
		this.props.getArchiveList('news');
	}

	render() {
		return <ItemsList {...this.props} isArchive />;
	}
}

const mapStateToProps = state => ({
	list: state.data.archive.map(item => ({
		...item,
		publishDate: dayjs(item.publishDate).format('YYYY-MM-DD')
	})),
	meta: state.data.meta.filter(item => item.code !== 'uuid')
});

export default connect(
	mapStateToProps,
	{ moveToActualAction, getArchiveList }
)(ArchiveContainer);
