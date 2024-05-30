<?php

namespace LuanRodrigues\Zapi\Services;

class GroupsService extends BaseService
{

    public function createGroup(string $name, array $members)
    {
        return $this->request('POST', 'create-group', [
            'autoInvite' => true,
            'groupName' => $name,
            'phones' => $members
        ]);
    }

    public function addParticipant(string $groupId, array $members)
    {
        return $this->request('POST', 'add-participant', [
            'autoInvite' => true,
            'groupId' => $groupId,
            'phones' => $members
        ]);
    }

    public function removeParticipant(string $groupId, array $members)
    {
        return $this->request('POST', 'remove-participant', [
            'groupId' => $groupId,
            'phones' => $members
        ]);
    }

    public function updateGroupName($groupId, $groupName)
    {
        return $this->request('POST', 'update-group-name', [
            'groupId' => $groupId,
            'groupName' => $groupName
        ]);
    }

    public function updateGroupPhoto($groupId, $image)
    {
        return $this->request('POST', 'update-group-photo', [
            'groupId' => $groupId,
            'groupPhoto' => $image
        ]);
    }

    public function leaveGroup($groupId)
    {
        return $this->request('POST', 'leave-group', [
            'groupId' => $groupId
        ]);
    }

    public function getGroup($groupId)
    {
        return $this->request('GET', 'group-metadata/'.$groupId);
    }

    public function updateGroupSettings($groupId, $adminOnlyMessage = false, $adminOnlySettings = false, $requireAdminApproval = false, $adminOnlyAddMember = false)
    {
        return $this->request('POST', 'update-group-settings', [
            'phone' => $groupId,
            'adminOnlyMessage' => $adminOnlyMessage,
            'adminOnlySettings' => $adminOnlySettings,
            'requireAdminApproval' => $requireAdminApproval,
            'adminOnlyAddMember' => $adminOnlyAddMember
        ]);
    }
}
