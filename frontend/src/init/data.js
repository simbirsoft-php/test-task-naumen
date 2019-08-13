// @flow
import { DATA_EVENTS } from 'constants/data';
import type { DataAction, DataState } from 'types/data';

const initialDataState: DataState = {
	news: [],
	archive: [],
	meta: [],
	loading: false
};

const fetchDataRequest: DataAction = {
	type: DATA_EVENTS.FETCH_DATA_REQUEST
};

const fetchDataSuccess: DataAction = {
	type: DATA_EVENTS.FETCH_DATA_SUCCESS
};

const fetchDataError: DataAction = {
	type: DATA_EVENTS.FETCH_DATA_ERROR
};

const moveToArchive = (itemId: string): DataAction => {
	return {
		type: DATA_EVENTS.MOVE_TO_ARCHIVE,
		payload: itemId
	};
};

const moveToActual = (itemId: string): DataAction => {
	return {
		type: DATA_EVENTS.MOVE_TO_ACTUAL,
		payload: itemId
	};
};

const setMetaList = (metaList: Array<Object>): DataAction => {
	return {
		type: DATA_EVENTS.SET_META_LIST,
		payload: metaList
	};
};

const fetchNewsSuccess = (newsList: Array<Object>): DataAction => {
	return {
		type: DATA_EVENTS.FETCH_NEWS_SUCCESS,
		payload: newsList
	};
};

const fetchArchiveSuccess = (archiveList: Array<Object>): DataAction => {
	return {
		type: DATA_EVENTS.FETCH_ARCHIVE_SUCCESS,
		payload: archiveList
	};
};

const updateNews = (newsData: Object): DataAction => {
	return {
		type: DATA_EVENTS.UPDATE_NEWS,
		payload: newsData
	};
};

export {
	initialDataState,
	fetchDataRequest,
	fetchDataSuccess,
	fetchDataError,
	moveToArchive,
	moveToActual,
	setMetaList,
	fetchNewsSuccess,
	fetchArchiveSuccess,
	updateNews
};
