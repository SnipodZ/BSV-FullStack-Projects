import type {Genre} from './genre'
import type {Publisher} from './publisher'
export interface Game{
    id: number;
    name: string;
    description: string | null;
    length: number;
    release_date: string | null;
    genre_id: number;
    publisher_id: number;
    genre: Genre;
    publisher: Publisher;
}