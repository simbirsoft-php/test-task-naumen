// @flow
import React, { Component } from 'react';
import styles from './ItemsList.less';
import Grid from '@material-ui/core/Grid';
import Item from './Item';

type Props = {
	list: Array<Object>,
	moveToArchiveAction: Function,
	meta: Array<Object>,
	isArchive?: boolean,
	saveListItem: Function,
	moveToActualAction: Function
};

type State = {
	editId: ?number
};

export class ItemsList extends Component<Props, State> {
	state = {
		editId: null
	};
	render() {
		if (!this.props.list.length) {
			return (
				<div className={styles.emptyMessage}>
					Список пуст
				</div>
			);
		}

		const items = this.props.list.map(item => {
			return (
				<Grid item xs={12} md={6} lg={4} key={item.uuid}>
					<Item
						item={item}
						meta={this.props.meta}
						editable={!this.props.isArchive}
						moveToArchive={this.props.moveToArchiveAction}
						saveListItem={this.props.saveListItem}
						moveToActive={this.props.moveToActualAction}
					/>
				</Grid>
			);
		});
		return (
			<div className={styles.list}>
				<Grid container spacing={3}>
					{items}
				</Grid>
			</div>
		);
	}
}

export default ItemsList;
