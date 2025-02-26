export interface AppChatMessage {
    readonly isLocal: boolean;
    readonly icon: string;
    readonly senderName: string;
    readonly dateTime: string;
    readonly text: string[];
}
