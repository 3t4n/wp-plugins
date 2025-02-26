export enum AuthenticationType {
    Name,
    Email,
    Both,
    None
}

export interface Config {
    readonly windowTitle: string;
    readonly inviteMessage: string;
    readonly unavailableMessage: string;
    readonly party: string;
    readonly phonesystemUrl: string;
    readonly allowCall?: boolean;
    readonly allowVideo?: boolean;
    readonly operatorIcon: string;
    readonly userIcon: string;
    readonly operatorName: string;
}
