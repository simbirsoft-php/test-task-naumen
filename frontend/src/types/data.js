// @flow
import { DATA_EVENTS } from 'constants/data';

type fetchDataRequest = {
	type: typeof DATA_EVENTS.FETCH_DATA_REQUEST,
	payload?: any
};
type fetchDataSuccess = {
	type: typeof DATA_EVENTS.FETCH_DATA_SUCCESS,
	payload?: any
};
type fetchDataError = {
	type: typeof DATA_EVENTS.FETCH_DATA_ERROR,
	payload?: any
};
type moveToArchive = {
	type: typeof DATA_EVENTS.MOVE_TO_ARCHIVE,
	payload: any
};
type moveToActual = {
	type: typeof DATA_EVENTS.MOVE_TO_ACTUAL,
	payload: any
};
type setMetaList = {
	type: typeof DATA_EVENTS.SET_META_LIST,
	payload: any
};
type fetchNewsSuccess = {
	type: typeof DATA_EVENTS.FETCH_NEWS_SUCCESS,
	payload: any
};
type fetchArchiveSuccess = {
	type: typeof DATA_EVENTS.FETCH_ARCHIVE_SUCCESS,
	payload: any
};
type updateNews = {
	type: typeof DATA_EVENTS.UPDATE_NEWS,
	payload: any
};

export type DataAction =
	| fetchDataRequest
	| fetchDataSuccess
	| fetchDataError
	| moveToArchive
	| moveToActual
	| setMetaList
	| fetchNewsSuccess
	| fetchArchiveSuccess
	| updateNews;

export type DataState = {
	news: Array<Object>,
	archive: Array<Object>,
	loading: boolean
};
