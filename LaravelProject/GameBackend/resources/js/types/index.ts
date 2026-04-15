export * from './auth';
export * from './navigation';
export * from './teams';
export * from './ui';
export type { Genre } from './genre'
export type { Publisher } from './publisher'
export type { Game } from './game'

import type { PageProps as InertiaPageProps } from '@inertiajs/core'

declare module '@inertiajs/core' {
    interface PageProps extends InertiaPageProps {
        flash: {
            success?: string
        }
        auth: {
            user: {
                id: number
                name: string
                email: string
            }
        }
    }
}