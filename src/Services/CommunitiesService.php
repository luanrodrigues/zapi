<?php

namespace LuanRodrigues\Zapi\Services;

use GuzzleHttp\RequestOptions;

class CommunitiesService extends BaseService
{
    public function createCommunitie($name)
    {
        return $this->request('POST', 'communities', [
            'name' => $name
        ]);
    }

    public function getCommunities()
    {
        return $this->request('GET', 'communities');
    }

    //TODO: not working
    public function communitieLinkGroups($communitieId, array $groupsPhones)
    {
        return $this->request('POST', 'communities/link', [
            'communityId' => $communitieId,
            'groupsPhones' => $groupsPhones
        ]);
    }

    public function communitieUnlinkGroups($communitieId, array $groupsPhones)
    {
        return $this->request('POST', 'communities/unlink', [
            'communityId' => $communitieId,
            'groupsPhones' => $groupsPhones
        ]);
    }

    public function getCommunitieMetadata($communitieId)
    {
        return $this->request('GET', 'communities-metadata/'.$communitieId);
    }

    public function redefineInvitationLink($communitieId)
    {
        return $this->request('POST', 'redefine-invitation-link/'.$communitieId);
    }

    public function addParticipant($communitieId, array $phones, $autoInvite = true)
    {
        return $this->request('POST', 'add-participant', [
            'communityId' => $communitieId,
            'phones' => $phones,
            'autoInvite' => $autoInvite
        ]);
    }


    public function removeParticipant($communitieId, array $phones)
    {
        return $this->request('POST', 'remove-participant', [
            'communityId' => $communitieId,
            'phones' => $phones
        ]);
    }


    //TODO: not working
    public function deleteCommunitie($communitieId){
        return $this->request('DELETE', 'communities/'.$communitieId);
    }
}
