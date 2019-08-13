// @flow
import React, { PureComponent } from 'react';
import styles from './Item.less';
import Paper from '@material-ui/core/Paper';
import Button from '@material-ui/core/Button';
import Typography from '@material-ui/core/Typography';
import Box from '@material-ui/core/Box';
import TextField from '@material-ui/core/TextField';

type Props = {
	item: Object,
	meta: Array<Object>,
	editable: boolean,
	saveListItem: Function,
	moveToArchive: Function,
	moveToActive: Function
};

type State = {
	isEditMode: boolean,
	data: Object
};

class Item extends PureComponent<Props, State> {
	constructor(props: Object) {
		super(props);

		this.state = {
			isEditMode: false,
			data: props.item
		};
	}

	handleChangeField = (field: string) => (e: SyntheticInputEvent<EventTarget>) => {
		e.persist();
		this.setState(prevState => ({
			data: {
				...prevState.data,
				[field]: e.target.value
			}
		}));
	};

	handleSaveClick = () => {
		this.setState(
			{
				isEditMode: false
			},
			() => {
				this.props.saveListItem(this.state.data);
			}
		);
	};

	handleEditClick = () => {
		this.setState({
			isEditMode: true
		});
	};

	handleMoveClick = () => {
		if (this.props.editable) {
			this.props.moveToArchive(this.props.item.uuid);
		} else {
			this.props.moveToActive(this.props.item.uuid);
		}
	};

	renderEditModeContent() {
		const textFields = this.props.meta.map(item => {
			if (item.editable) {
				return (
					<TextField
						type={item.type}
						id={item.code}
						label={item.title}
						value={this.state.data[item.code]}
						onChange={this.handleChangeField(`${item.code}`)}
						margin='normal'
						className={styles[item.code]}
						multiline={item.code === 'text'}
						fullWidth
					/>
				);
			}
		});
		return <div className={styles.content}>{textFields}</div>;
	}

	renderContent() {
		return (
			<div className={styles.content}>
				<div className={styles.heading}>
					<a href={`/#${this.props.item.uuid}`}>
						<Typography variant='h6' component='h3' className={styles.title}>
							{this.props.item.title}
						</Typography>
					</a>
					<div className={styles.publishDate}>
						{this.props.item.publishDate}
					</div>
				</div>
				<Typography variant='body2' component='p'>
					{this.props.item.text}
				</Typography>
				<div className={styles.author}>Автор: {this.props.item.authorTitle}</div>
			</div>
		);
	}

	render() {
		return (
			<Paper className={styles.item} square>
				<div className={styles.image} style={{ backgroundImage: `url(${this.props.item.logo})` }} />
				{this.state.isEditMode ? this.renderEditModeContent() : this.renderContent()}
				<Box borderColor='grey.500' borderTop={1} className={styles.actions}>
					{this.props.editable && !this.state.isEditMode && (
						<Button size='small' color='primary' onClick={this.handleEditClick}>
							Редактировать
						</Button>
					)}
					{this.props.editable && this.state.isEditMode && (
						<Button size='small' color='primary' onClick={this.handleSaveClick}>
							Сохранить
						</Button>
					)}
					<Button size='small' color='primary' onClick={this.handleMoveClick}>
						{this.props.editable ? 'Поместить в архив' : 'Убрать из архива'}
					</Button>
				</Box>
			</Paper>
		);
	}
}

export default Item;
